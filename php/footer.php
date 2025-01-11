<!-- Footer -->
<footer class="bg-dark text-white pt-4 pb-3">
    <div class="container">
        <div class="row">
            <!-- First Column: Contact Information -->
            <div class="col-md-4">
                <h5>Contact - 24x7</h5>
                <ul class="list-unstyled">
                    <li><strong>Email:</strong> shubham.m9022@gmail.com</li>
                    <li><strong>Phone:</strong> +91 8888888888</li>
                </ul>
            </div>

            <!-- Second Column: Useful Links -->
            <div class="col-md-4">
                <h5>Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="http://localhost/SnapMart/" class="text-white">Home</a></li>
                    <!-- Category -->
                    <?php
                require "db.php";
                 $dta=$db->query("SELECT * FROM category");
                 while($ary=$dta->fetch_assoc()){
                $category=$ary['category_name'];
                echo "<li><a href='http://localhost/SnapMart/category/".$ary['category_url']."' class='text-light'>".$category."</a></li>";
            }
                ?>
                 <li><a href='http://localhost/SnapMart/Orders' class='text-white'>Your Orders</a></li>
                </ul>
            </div>

            <!-- Third Column: Social Media/Contact Links -->
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#" class="text-white"><i class="fab fa-x-twitter"></i> (Twitter)</a></li>
                    <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#" class="text-white"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                    <li><a href="#" class="text-white"><i class="fab fa-youtube"></i> YouTube</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<style>
    footer {
        background-color: #333; /* Dark background */
    }
    footer h5 {
        color: #f1f1f1; /* Light color for headings */
    }
    footer a {
        color: #bbb; /* Light grey color for links */
        text-decoration: none;
    }
    footer a:hover {
        color: #fff; /* White color on hover */
        text-decoration: underline;
    }
</style>

