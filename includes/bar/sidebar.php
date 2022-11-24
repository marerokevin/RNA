<div class="sidebar-wrapper">
    <div class="sidebar" id="mySidebar">
        <ul>
        <?php $useraccess = $_SESSION["user_level"]; ?>
            <li><a href="/RNA/K/index.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="/RNA/K/item-request.php?action=status"><i class="fas fa-shopping-cart"></i>Item Request</a></li>
            <li><a href="/RNA/K/Invento1ry.php"><i class="fas fa-box-open"></i>Inventory</a></li>
        </ul> 
    </div>
</div>
<script defer src="/DNA/resources/scripts/sidebar.js"></script>