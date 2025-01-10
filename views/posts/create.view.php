<?php
view('partials/head', [
    'pageTitle' => $pageTitle,
]);
view('partials/nav');
view('partials/banner', [
    'pageTitle' => $pageTitle,
]);
?>

<main>
    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/posts" class="block mb-4 underline text-teal-500">
            Go Back
        </a>

        <form action="/posts/store" method="POST">
            <div>
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <div class="mt-2">
                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input value="<?= $_POST['title'] ?? '' ?>" type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Post Title">
                    </div>
                </div>
                <?php if (isset($errors['title'])): ?>
                    <p class="mt-2 text-sm text-red-600"> <?= $errors['title'] ?> </p>
                <?php endif ?>
            </div>

            <div class="mt-6">
                <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                <div class="mt-2">
                    <textarea rows="6" name="content" placeholder="Post Content" id="content" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= $_POST['content'] ?? '' ?></textarea>
                </div>
                <?php if (isset($errors['content'])): ?>
                    <p class="mt-2 text-sm text-red-600"> <?= $errors['content'] ?> </p>
                <?php endif ?>
            </div>


            <div class="mt-6 flex items-center gap-4">
                <a href="/posts" class="block rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="block rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create New Post
                </button>


            </div>
        </form>
    </div>
</main>

<?php
view('partials/footer');
?>