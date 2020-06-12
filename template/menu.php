<?php function createLink($href, $icon, $text) {
    $is_active = $_SERVER['PHP_SELF'] === '/' . $href;
    $class_name = $is_active ? 'active' : '';

    print("
        <li class='$class_name'>
            <a href='$href'>
                <i class='fa $icon'></i>
                <span>$text</span>
            </a>
        </li>
    ");
} ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php createLink("index.php", "fa-calendar", "Главная"); ?>
            <li class="header">Пользователи</li>
            <?php
            createLink("list-personal.php", "fa-users", "Пользователи");
            ?>
            <li class="header">Справочники</li>
            <?php
            createLink("list-obitanie.php", "fa-users", "Зоны обитания");
            createLink("list-type.php", "fa-users", "Типы рационов");
            createLink("list-racion.php", "fa-users", "Список рационов");
            ?>
            <li class="header">Животные</li>
            <?php
            createLink("list-animals.php", "fa-users", "Список всех животных");
            createLink("list-mammals.php", "fa-users", "Список млекопитающих");
            createLink("list-bird.php", "fa-users", "Список птиц");
            createLink("list-reptail.php", "fa-users", "Список рептилий");
            ?>
        </ul>
    </section>
</aside>
<!-- /.sidebar-menu -->