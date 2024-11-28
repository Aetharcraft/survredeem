<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurvStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center">Welcome to SurvStore</h1>
        <div class="mt-8">
            <h2 class="text-xl font-bold">Coin List</h2>
            <ul class="mt-4">
                <?php
                $db = new PDO('sqlite:db.sqlite');
                $coins = $db->query("SELECT * FROM coins")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($coins as $coin) {
                    echo "<li class='py-2'>{$coin['name']} - {$coin['price']} IDR</li>";
                }
                ?>
            </ul>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-bold">Redeem Code</h2>
            <form action="redeem.php" method="POST" class="mt-4">
                <input type="text" name="username" placeholder="Minecraft Username" required
                    class="border p-2 rounded w-full mb-4">
                <select name="type" class="border p-2 rounded w-full mb-4">
                    <option value="java">Java</option>
                    <option value="bedrock">Bedrock</option>
                </select>
                <input type="text" name="code" placeholder="Redeem Code" required
                    class="border p-2 rounded w-full mb-4">
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded">Redeem</button>
            </form>
        </div>
    </div>
</body>
</html>
