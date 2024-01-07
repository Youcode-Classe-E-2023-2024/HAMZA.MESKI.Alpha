<nav class="bg-gray-800 p-4">
    <a href="<?php echo URLROOT; ?>" class="text-white text-lg font-bold">Logo</a>

    <div class="flex justify-between">
        <div class="flex">
            <ul class="flex space-x-4">
                <li>
                    <a href="<?php echo URLROOT; ?>/pages/index" class="text-white hover:text-gray-300">Home</a>
                </li>
                <li>
                    <a href="<?php echo URLROOT; ?>/pages/about" class="text-white hover:text-gray-300">About</a>
                </li>
            </ul>
    
            <!-- if the user have been login -->
            <?php if(isset($_SESSION['user_id'])): ?>
                <ul class="flex space-x-4 ml-4">
                    <li>
                        <a href="<?php echo URLROOT; ?>/dashboard/index" class="text-white hover:text-gray-300">Dashboard</a>
                    </li>
                </ul>
                <ul class="flex space-x-4 ml-4">
                    <li>
                        <a href="<?php echo URLROOT; ?>/users/logout" class="text-white hover:text-gray-300">Logout</a>
                    </li>
                </ul>
            <?php endif ?>
    
            <!-- if not -->
            <?php if(!isset($_SESSION['user_id'])):?>
                <ul class="flex space-x-4 ml-4">
                    <li>
                        <a href="<?php echo URLROOT; ?>/users/register" class="text-white hover:text-gray-300">Register</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/users/login" class="text-white hover:text-gray-300">Login</a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
        <div class="relative">
            <?php if(isset($_SESSION['user_id'])):?>
                <div class="flex items-center ">
                    <ion-icon id="notif-id" name="notifications" class="text-white text-3xl cursor-pointer"></ion-icon>
                    <strong id="notif-number" class="m bg-red-500 h-6 w-6 rounded-full text-center">4</strong>
                </div>
                <div id="notif-content" class="Hidden absolute right-0 w-[300px] bg-red-500 rounded-md">
                    <button id="mark-read" class="p-2">Mark all as read</button><br>
                    <div id="not-content" class="p-4">
                        <strong>* hamza add product</strong><br>
                        <strong>* meski add product</strong><br>
                        <strong>* jake add product</strong><br>
                        <strong>* maad add product</strong><br>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</nav>
