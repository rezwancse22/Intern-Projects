<!DOCTYPE html>
<html>
<head>
    <title>About</title>
</head>

<body>

<h1>I am rezwan</h1>

<p>This is About Page.</p>


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