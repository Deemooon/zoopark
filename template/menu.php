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
            createLink("list-obitanie.php", "fa-users", "???");
            createLink("list-student.php", "fa-users", "??");
            ?>
            <li class="header">Справочники</li>
            <?php
            createLink("list-obitanie.php", "fa-users", "Зоны обитания");
            createLink("list-type.php", "fa-users", "Типы рационов");
            createLink("list-special.php", "fa-users", "??");
            createLink("list-subject.php", "fa-users", "?? ");
            createLink("list-classroom.php", "fa-users", "??");
            ?>
            <li class="header">Управление расписанием</li>
            <?php createLink("list-teacher-schedule.php", "fa-users", "?? и ??"); ?>
        </ul>
    </section>
</aside>
<!-- /.sidebar-menu -->