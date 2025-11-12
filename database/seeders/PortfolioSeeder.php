<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data yang sudah ada (optional)
        // User::truncate();
        // Experience::truncate();
        // Education::truncate();
        // Skill::truncate();
        // Project::truncate();

        // Create admin user - hanya jika belum ada
        User::firstOrCreate(
            ['email' => 'admin@portfolio.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Create regular user - hanya jika belum ada
        User::firstOrCreate(
            ['email' => 'user@portfolio.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        // Data pengalaman - hanya jika belum ada
        Experience::firstOrCreate(
            ['title' => 'Full Stack Developer', 'company' => 'PT. Teknologi Indonesia'],
            [
                'start_date' => '2022-01-01',
                'end_date' => null,
                'current' => true,
                'description' => 'Mengembangkan aplikasi web menggunakan Laravel dan Vue.js. Bertanggung jawab atas pengembangan frontend dan backend.'
            ]
        );

        Experience::firstOrCreate(
            ['title' => 'Web Developer', 'company' => 'CV. Digital Solution'],
            [
                'start_date' => '2020-03-01',
                'end_date' => '2021-12-31',
                'current' => false,
                'description' => 'Membangun website company profile dan e-commerce untuk berbagai klien.'
            ]
        );

        // Data pendidikan - hanya jika belum ada
        Education::firstOrCreate(
            ['degree' => 'Sarjana Teknik Informatika', 'institution' => 'Universitas Indonesia'],
            [
                'start_year' => 2016,
                'end_year' => 2020,
                'current' => false,
                'description' => 'Fokus pada pengembangan perangkat lunak dan teknologi web.'
            ]
        );

        Education::firstOrCreate(
            ['degree' => 'SMA Negeri 1 Jakarta', 'institution' => 'SMA Negeri 1 Jakarta'],
            [
                'start_year' => 2013,
                'end_year' => 2016,
                'current' => false,
                'description' => 'Jurusan IPA'
            ]
        );

        // Data skills
        $skills = [
            ['name' => 'PHP', 'category' => 'programming', 'level' => 5, 'icon' => 'php'],
            ['name' => 'JavaScript', 'category' => 'programming', 'level' => 4, 'icon' => 'js'],
            ['name' => 'Laravel', 'category' => 'framework', 'level' => 5, 'icon' => 'laravel'],
            ['name' => 'Vue.js', 'category' => 'framework', 'level' => 4, 'icon' => 'vuejs'],
            ['name' => 'React', 'category' => 'framework', 'level' => 3, 'icon' => 'react'],
            ['name' => 'MySQL', 'category' => 'tool', 'level' => 4, 'icon' => 'database'],
            ['name' => 'Git', 'category' => 'tool', 'level' => 4, 'icon' => 'git'],
            ['name' => 'Tailwind CSS', 'category' => 'framework', 'level' => 4, 'icon' => 'css3-alt'],
            ['name' => 'Problem Solving', 'category' => 'soft_skill', 'level' => 5, 'icon' => null],
            ['name' => 'Teamwork', 'category' => 'soft_skill', 'level' => 4, 'icon' => null],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }

        // Data proyek
        Project::firstOrCreate(
            ['title' => 'Sistem Manajemen Inventory'],
            [
                'description' => 'Aplikasi web untuk mengelola inventory dengan fitur real-time tracking dan reporting. Sistem ini membantu perusahaan dalam mengoptimalkan manajemen stok dan mengurangi kerugian.',
                'image_url' => null,
                'project_url' => 'https://example.com/inventory',
                'github_url' => 'https://github.com/username/inventory-system',
                'technologies' => 'Laravel, Vue.js, MySQL, Tailwind CSS',
                'featured' => true,
            ]
        );

        Project::firstOrCreate(
            ['title' => 'E-commerce Platform'],
            [
                'description' => 'Platform e-commerce lengkap dengan payment gateway integration. Mendukung multi-vendor dan memiliki sistem manajemen order yang komprehensif.',
                'image_url' => null,
                'project_url' => 'https://example.com/ecommerce',
                'github_url' => 'https://github.com/username/ecommerce',
                'technologies' => 'Laravel, React, MySQL, Stripe API',
                'featured' => true,
            ]
        );

        Project::firstOrCreate(
            ['title' => 'Company Profile Website'],
            [
                'description' => 'Website company profile modern dengan CMS custom. Dilengkapi dengan blog system dan contact form yang terintegrasi dengan email.',
                'image_url' => null,
                'project_url' => 'https://example.com/company',
                'github_url' => 'https://github.com/username/company-profile',
                'technologies' => 'Laravel, Bootstrap, MySQL',
                'featured' => true,
            ]
        );
    }
}