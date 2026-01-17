<header>
    <nav class="navbar">
        <div class="logo">Desa Poco Golo Kempo</div>

        <ul class="nav-links" id="navLinks">
            <li><a href="/pocogolo/#home">Beranda</a></li>
            <li><a href="/pocogolo/#about">Tentang</a></li>
            <li><a href="/pocogolo/#gallery">Galeri</a></li>
            <li><a href="/pocogolo/#struktur">Perangkat Desa</a></li>
            <li><a href="/pocogolo/#contact-section">Kontak</a></li>

            <!-- REGULASI DROPDOWN -->
            <li class="dropdown">
                <a href="#">Regulasi ▾</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="drop-a" href="/pocogolo/documents.php">
                            Arsip Dokumen
                        </a>
                    </li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li>
                        <a class="drop-a" href="/pocogolo/admin/activity-log.php">
                            Activity Log
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>

            <!-- AUTH SECTION -->
            <?php if (isset($_SESSION['role'])): ?>
            <li>
                <a href="/pocogolo/auth/logout.php">Logout</a>
            </li>
            <?php else: ?>
            <li>
                <a href="/pocogolo/auth/login.php">Login</a>
            </li>
            <li>
                <a href="/pocogolo/auth/register.php">Daftar</a>
            </li>
            <?php endif; ?>
        </ul>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>