<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--favicon-->
    <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/user-dash1.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap JS (Optional, for components like modals, tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<style>
    .nav-item {
        position: relative;
        list-style: none;
    }

    .nav-link {
        text-decoration: none;
        color: #000;
        font-weight: 600;
        padding: 10px 15px;
        display: block;
        cursor: pointer;
        z-index: 101;
        /* Ensure above dropdown */
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        border: 1px solid #ddd;
        border-radius: 6px;
        min-width: 180px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        z-index: 100;
        padding: 0;
    }

    .nav-item:focus-within .dropdown-menu {
        display: block;
    }

    /* Fix: make text always visible */
    .dropdown-item {
        display: block;
        padding: 10px 15px;
        color: #333 !important;
        /* force color */
        text-decoration: none;
        font-weight: 500;
        opacity: 1 !important;
        /* ensure visible */
    }

    .dropdown-item:hover {
        background: #f1f1f1;
        color: #000 !important;
    }

    <style>.alert {
        border-radius: 6px;
        padding: 12px 16px;
        font-weight: 500;
    }

    .alert-danger {
        background-color: #ffe6e6;
        color: #d63333;
        border: 1px solid #f5c2c2;
    }

    .alert-success {
        background-color: #e6ffe6;
        color: #2d862d;
        border: 1px solid #b2e0b2;
    }
</style>
</style>

<body>
    <div class="wrapper">
        @include('dashboard.includes.sidebar')
        <main class="content">
            <div>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
            @include('dashboard.includes.header')
            <div class="dashboard-box">

                @yield('content')
            </div>
            <script>
                function toggleLogoutBox() {
                    var logoutBox = document.getElementById("logoutBox");
                    logoutBox.style.display = logoutBox.style.display === "none" ? "block" : "none";
                }
            </script>

            <div class="">

            </div>
        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById("sidebar");
            const hamburger = document.getElementById("hamburger");
            const closeBtn = document.getElementById("close-btn");

            hamburger.addEventListener("click", () => {
                sidebar.classList.add("show");
            });

            closeBtn.addEventListener("click", () => {
                sidebar.classList.remove("show");
            });
        });

        function previewProfilePicture(event) {
            const previewDiv = document.getElementById('profilePreview');
            previewDiv.innerHTML = ''; // Clear old image

            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.width = 100;
                img.style.borderRadius = '12px';
                img.style.display = 'block';
                previewDiv.appendChild(img);
            }
        }

        function previewProfilePicture(event) {
    const file = event.target.files[0];
    const img = document.getElementById('profileImg');

    if(file) {
        img.src = URL.createObjectURL(file);
        img.style.display = 'block'; // Show the image if it was hidden
    }
}
    </script>

</body>

</html>
