    <header class="container">
        <a href="index.php"><img src="./assets/img/logo.png" alt=""></a>
        <nav>
            <ul>
                <?php if (isset($_SESSION['id'])): ?>
                <li><a href="index.php">Головна</a></li>
                <li><a href="adv.php">Новини</a></li>
                <?php endif; ?>
                <li>
                    <?php if (isset($_SESSION['id'])): ?>
                            <a href=""> <?php echo $_SESSION['name']; ?> </a>
                        <ul>
                            <?php if ($_SESSION['teacher']): ?>
                            <li><a href="subjects.php">Журнал<br>оцінок</a></li>
                            <li><a href="manageads.php ">Оголошення</a></li>
                                <?php if ($_SESSION['admin']): ?>
                                    <li><a href="managepost.php">Новини</a></li>
                                    <li><a href="manageuser.php">Керувати<br>користувачами</a></li>
                                <?php endif; ?>
                            <?php else: ?>
                            <li><a href="subjects.php">Поточний<br>контроль</a></li>
                            <?php endif; ?>
                            <li><a href="logout.php">Вихід</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="log.php">Вхід</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>