<!doctype html>
<title>Site On Maintenance</title>
<style>
    body {
        font: 20px Helvetica, sans-serif;
        background-color: rgba(26, 32, 44, 1);
        text-align: center;
        margin: 0;
    }

    article {
        display: flex;
        text-align: center;
        align-items: center;
        width: 650px;
        margin: 0 auto;
        height: 100vh;
    }


    article h1 {
        font-size: 50px;
        margin: 0;
    }


    article h1,
    article p {
        color: #a0aec0;
    }


    article img {
        height: 600px;
    }



    .w-100 {
        width: 100%;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
<article>

    <div class="text-center">
        <img src="<?php echo e(helper::image_path(helper::appdata('')->maintenance_image)); ?>" alt="store maintenance"
            class="w-100 object-fit-cover">
        <h1>Maintenance Mode</h1>
        <p>Sorry for the inconvenience but we are performing some maintenance at the moment. we will be back online
            shortly!</p>

    </div>

</article>
<?php /**PATH /mnt/c/restro-saas/resources/views/errors/maintenance.blade.php ENDPATH**/ ?>