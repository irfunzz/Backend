<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <title>TO DO LIST</title>

    <!-- Style untuk animasi background -->
    <style>
        /* Background gradient dengan animasi */
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            overflow: hidden;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Animasi partikel */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            animation: particleAnimation 10s linear infinite;
        }

        @keyframes particleAnimation {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(100vh); opacity: 0; }
        }

        /* Styling untuk teks "Created by" di pojok bawah kanan */
        .footer-text {
            position: fixed;
            bottom: 10px;
            right: 20px;
            color: white;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
            font-weight: 600;
            z-index: 999;
        }
    </style>
</head>

<body>
    <!-- Elemen partikel untuk efek animasi -->
    <div class="particle" style="width: 10px; height: 10px; left: 10%; animation-duration: 5s;"></div>
    <div class="particle" style="width: 15px; height: 15px; left: 30%; animation-duration: 8s;"></div>
    <div class="particle" style="width: 8px; height: 8px; left: 50%; animation-duration: 12s;"></div>
    <div class="particle" style="width: 12px; height: 12px; left: 70%; animation-duration: 6s;"></div>
    <div class="particle" style="width: 18px; height: 18px; left: 90%; animation-duration: 10s;"></div>

    <!-- Bagian Header -->
    <header class="text-center py-10">
        <h3 class="text-5xl font-bold text-white animate-pulse">Selamat Datang di TO DO LIST</h3>
        <p class="mt-4 text-xl text-gray-200">Kelola daftar tugasmu dengan mudah dan efisien!</p>
    </header>

    <!-- Konten Utama -->
    <div class="flex items-center justify-center h-[60vh]">
        <a href="{{route('todos.index')}}" 
           class="text-center bg-gradient-to-r from-blue-500 via-green-500 to-purple-500 text-white py-5 px-12 rounded-full shadow-lg transform transition duration-300 hover:scale-110 hover:shadow-2xl flex items-center gap-3">
            <i class="fas fa-tasks"></i> Pergi ke Halaman TO DO LIST
        </a>
    </div>

    <!-- Bagian Footer -->
    <footer class="text-center mt-16 py-5 bg-gray-900">
        <p class="text-gray-400">© 2024 TO DO LIST App> Dibuat dengan penuh perjuangan WQ</p>
    </footer>

    <!-- Teks di Pojok Bawah Kanan -->
    <div class="footer-text">
        Create by: Muhammad Irfan
    </div>

    <!-- jQuery & Bootstrap Bundle JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
