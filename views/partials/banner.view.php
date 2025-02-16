<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>


<header class="bg-white shadow">
    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                <?= $pageTitle ?>
            </h1>

            <?php if ($currentPath === '/posts'): ?>
                <a href="/posts/create" class="border rounded-lg px-4 py-1.5">Create New Post</a>
            <?php endif ?>
        </div>
    </div>
</header>