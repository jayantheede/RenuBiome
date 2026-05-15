<?php

namespace Controllers\Api;

class CmsController
{
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = __DIR__ . '/../../../database/data.json';
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function isAuthenticated()
    {
        return isset($_SESSION['user_id']) && $_SESSION['role'] === 'super_admin';
    }

    public function getPages()
    {
        header('Content-Type: application/json');
        
        // Security Feature: Only allow viewing CMS data if authenticated
        if (!$this->isAuthenticated()) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized access to SaaS CMS.']);
            return;
        }

        if (file_exists($this->dataFile)) {
            $data = json_decode(file_get_contents($this->dataFile), true);
            echo json_encode([
                'status' => 'success',
                'data' => $data
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data file not found.'
            ]);
        }
        http_response_code(200);
    }

    public function savePage()
    {
        header('Content-Type: application/json');
        
        // Security Feature: Only allow saving CMS data if authenticated
        if (!$this->isAuthenticated()) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized modification attempt to SaaS CMS.']);
            return;
        }
        
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (file_exists($this->dataFile)) {
            $data = json_decode(file_get_contents($this->dataFile), true);
            
            // If saving products array directly
            if (isset($input['page']) && $input['page'] === 'products') {
                $data['products'] = $input['data'];
            } else {
                // Merge the incoming page data
                $pageName = $input['page'] ?? 'home';
                $pageData = $input['data'] ?? [];
                $data[$pageName] = array_merge($data[$pageName] ?? [], $pageData);
            }
            
            file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT));
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Content saved successfully.',
                'timestamp' => time()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data file not found.'
            ]);
        }
        http_response_code(200);
    }
}
