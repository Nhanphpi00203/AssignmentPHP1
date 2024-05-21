<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
        </tr>
        <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['proid']); ?></td>
                <td><?php echo htmlspecialchars($row['proName']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><?php echo htmlspecialchars($row['image']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
