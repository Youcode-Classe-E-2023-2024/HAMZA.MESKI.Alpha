<?php require APPROOT . '/views/inc/header.php'; ?>
<main id="managePosts_index" class="p-4">
    <section class="flex justify-between">
        <div>Posts</div>
        <a href="#" class="flex items-center bg-blue-500 text-white p-2 rounded-md">
            <ion-icon name="pencil-outline" role="img" class="md hydrated"></ion-icon>
            <p>Add post</p>
        </a>
    </section>

    <table id="postsTable" class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4">Id</th>
                <th class="py-2 px-4">UserId</th>
                <th class="py-2 px-4">title</th>
                <th class="py-2 px-4">body</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>