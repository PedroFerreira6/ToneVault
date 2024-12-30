<?php
require_once 'app/models/AudioModel.php';
class SearchController
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $audioModel = new AudioModel();
            $page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
            $searchQuery = isset($_GET['s']) ? trim($_GET['s']) : null;

            $limit = 10;
            $offset = ($page - 1) * $limit;

            if ($searchQuery) {
                $audiosList = $audioModel->searchAudios($searchQuery, $limit, $offset);
                $totalAudios = $audioModel->countSearchResults($searchQuery);
            } else {
                $audiosList = $audioModel->getRecentAudios($limit, $offset);
                $totalAudios = $audioModel->countTotalAudios();
            }

            $totalPages = ceil($totalAudios / $limit);
            require_once './app/views/searchView.php';
        } else {
            header("location:/");
        }
    }
}
