<div class="sidebar-wrapper">
    <div class="sidebar" id="mySidebar">
        <ul>
        <?php $useraccess = $_SESSION["user_level"]; ?>
            <li><a href="/RNA/K/index.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li id="adminrequest"><a href="/RNA/K/Function.php" id="adminrequest" ><i class="fas fa-address-book"></i>Requests</a></li>
            <li><a href="/RNA/K/item-request.php"><i class="fas fa-shopping-cart"></i>Item Request</a></li>
            <li><a href="/RNA/K/Inventory.php"><i class="fas fa-box-open"></i>Inventory</a></li>
        </ul> 
    </div>
</div>
<script defer src="/DNA/resources/scripts/sidebar.js"></script>

<script>
    var access = <?php echo json_encode("$useraccess"); ?>

    console.log(access);

    if (access == "User") {
        document.getElementById("adminrequest").style.display = "none";
    } else if (access == "Administrator") {
        document.getElementById("adminrequest").style.display = "flex";
    }
</script>