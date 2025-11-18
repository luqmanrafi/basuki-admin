<?php

namespace App\Controllers;

use App\Models\MitraModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $mitraModel = new MitraModel();
        $userModel = new UserModel();

        // Get total counts
        $totalMitra = $mitraModel->countAllResults();
        $totalUsers = $userModel->countAllResults();
        // $activeMitra = $mitraModel->where('status', 'aktif')->countAllResults(); // Asumsi ada kolom status

        // Get chart data
        $monthlyOverview = $mitraModel->getMonthlyOverview();
        $chartLabels = [];
        $chartData = [];
        foreach ($monthlyOverview as $row) {
            $chartLabels[] = $row['month'];
            $chartData[] = $row['count'];
        }

        $data = [
            'title'       => 'Admin Dashboard',
            'totalMitra'  => $totalMitra,
            'totalUsers'  => $totalUsers,
            // 'activeMitra' => $activeMitra,
            'chartLabels' => json_encode($chartLabels),
            'chartData'   => json_encode($chartData),
        ];

        return view('admin/dashboard', $data);
    }
}
