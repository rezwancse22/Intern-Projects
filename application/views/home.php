<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>

<body>

<h1>Welcome to I am S.M Rezwanul Bin Hafiz</h1>

<h2>Hello Git</h2>

<p>This is my Home Page.</p>


<!-- Today's Analytics -->
<div style="
    margin-top: 450px;
    margin-left: auto;
    margin-right: 20px;
    padding: 15px 20px;
    width: 350px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f8f9fa;
">

    <h3>Today's Analytics</h3>

    <p>
        Date:
        <strong>
            <?php echo date('d F Y', strtotime($analytics['date'])); ?>
        </strong>
    </p>

    <p>
        Today's Views:
        <strong>
            <?php echo $analytics['views']; ?>
        </strong>
    </p>

    <p>
        Today's Unique Visitors:
        <strong>
            <?php echo $analytics['unique_visitors']; ?>
        </strong>
    </p>

</div>

</body>
</html>