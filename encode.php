<html>
    <head>
        <title>ENCODE</title>
        <link rel="stylesheet" href="encode.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="getAYstaff.js"></script>
        
<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head>
    <body>
    
        <div class="container">
            <div class="top">
            <h1 style="margin: 0;">TITLE HERE</h1>
            <hr>
            <?php include "getaystaff.php";  ?>
            
            </div><!-- div sa select -->
            <div class="bot">
                <div class="searchdiv">
                    <div class="searchbar">
                        <div>
                            
                        <form class="formsearch" id="sarah">
                            <label class="labelsearch" style="color: white;">SEARCH</label> 
                        </div>
                        <div style="width: 100%;">
                            <input type="text" class="search" name="search" id="searchInput" >
                            <div id="results"></div>
                        </form>
                        
                        </div>
                        
                        
                    </div>
                    
                    
                    <div class="name">
                        <h3 style="margin: 0; font-family: monospace; font-size: 20;">
                        
                        123456 / MARIA SARAH JEAN D. CUI BSIT-4</h3>
                    </div>
                </div>
                
                <div class="resibo">
                    <div class="addbayad">
                   
                        <form class="resiboform" action="addpayment.php" method="post">
                            <!-- sid:<input type="text" name= "sid" id="sid"><br>
                            ay: <input type="text" name="ay" id="ayyy"> -->
                        <table class="resibotb">
                            <tr>
                                <td style="width: 27%; padding-left: 20px;">Official Receipt </td>
                                <td><input type="text"  name="res" required></td>
                            </tr>
                            <tr>
                                <td style="width: 27%; padding-left: 20px;">Date</td>
                                <td><input type="text"  name="date" required></td>
                            </tr>
                            <tr>
                                <td style="width: 27%; padding-left: 20px;">Amount</td>
                                <td><input type="text" id="amt" name="amt" required></td>
                            </tr>
                            <tr>
                                <td style="width: 27%; padding-left: 20px;">Academic Year</td>
                                <td><input type="text" id="ay" name="ay" required ></td>
                            </tr>
                        </table>
                            <!-- <button class="submit">submit</button> -->
                        </form>
                        <?php 
                        if(isset($_GET['error'])){?>
                        <p class="error"><?php 
                        echo $_GET['error'];?></p>
                        <?php } ?> 
                    </div>
                    <div class="resibogroup" >
                            
                        <div class="listsabayad">
                             <div id="">
                                 
                                <table class="lamesa" border="1" style="color: white; width: 450;">
                                    <thead>
                                        <tr>
                                            <th>Official Receipt</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody id="sudlanan"> -->
                                    <?php  
                            include"listbayad.php"; ?>
                                    </tbody>
                                </table>
                            </div> 
                            
                        </div>

                        <div class="total" id="total">
                            Total Tuition: <input type="text" name="" id="" value="PHP 1620.00" style="width: 86px; font-size: 13; height: 24px;">
                            Balance:
                            <input type="text" name="" id="" value="PHP 870.00" style="width: 86px; font-size: 13; height: 24px;">                   Total Amount: 
                            <input type="text" name="" id="" value="PHP 750.00" style="width: 86px; font-size: 13; height: 24px;"> 


                        </div>
                    </div>
                    
                </div>
                <div class="buttons">
                    <button>reports</button>
                </div>
            
            
            </div> 
                
        
        </div>
        
        <script src="encode.js"></script>


    </body>
</html>