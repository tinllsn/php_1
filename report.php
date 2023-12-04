<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <title>Organic Management System</title>
    <link rel="shortcut icon" href="./images/o.jpg" />
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">OS</h3>
            <div class="dashboard_sidebar_user">
                <img src="images/o.jpg" alt="" id="userImage">
                <span>ADMIN</span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists">
                    <li>
                        <a href="dashboard.php" ><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                    </li>
                    <li class="menuActive">
                        <a href=""><i class="fa fa-line-chart"></i> <span class="menuText">Report</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-shopping-basket"></i> <span class="menuText">Product</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-recycle"></i> <span class="menuText">Supplier</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-cart-plus"></i> <span class="menuText">Purchase Order</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user"></i> <span class="menuText">User</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topNav">
                <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
                <a href="" id="logoutBtn"><i class="fa fa-sign-out"></i> Log-out </a>
            </div>
            <div id="reportsContainer">
                <div class="reportTypeContainer">
                    <div class="reportType"> 
                        <p>Report 1</p>
                        <div class="alignRight">
                            <a href="" class="reportExportBtn">Excel</a>
                            <a href="" class="reportExportBtn">PDF</a>
                        </div>
                    </div>
                    <div class="reportType"> 
                        <p>Report 2</p>
                        <div class="alignRight">
                            <a href="" class="reportExportBtn">Excel</a>
                            <a href="" class="reportExportBtn">PDF</a>
                        </div>
                    </div>          
                </div>
                <div class="reportTypeContainer">
                    <div class="reportType"> 
                        <p>Report 3</p>
                        <div class="alignRight">
                            <a href="" class="reportExportBtn">Excel</a>
                            <a href="" class="reportExportBtn">PDF</a>
                        </div>
                    </div>
                    <div class="reportType"> 
                        <p>Report 4</p>
                        <div class="alignRight">
                            <a href="" class="reportExportBtn">Excel</a>
                            <a href="" class="reportExportBtn">PDF</a>
                        </div>
                    </div>          
                </div>
                
                
            </div>
        </div>
    </div>


    <script>
        var sideBarIsOpen=true;

        toggleBtn.addEventListener('click', (event) => {
            event.preventDefault();

            if(sideBarIsOpen){
                dashboard_sidebar.style.width='10%';
                dashboard_sidebar.style.transition='0.3s all';
                dashboardMainContainer.style.width='90%';
                dashboard_logo.style.fontsize='60px';
                userImage.style.width='60px';

                menuIcons = document.getElementsByClassName('menuText');
                for(var i=0;i<menuIcons.length;i++){
                    menuIcons[i].style.display='none';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlgin='center';
                sideBarIsOpen=false;

            } else {
                dashboard_sidebar.style.width='20%';
                dashboardMainContainer.style.width='100%';
                dashboard_logo.style.fontsize='80px';
                userImage.style.width='80px';

                menuIcons = document.getElementsByClassName('menuText');
                for(var i=0;i<menuIcons.length;i++){
                    menuIcons[i].style.display='inline-block';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlgin='normal';
                sideBarIsOpen=true;
            }
            
        })
    </script>
</body>
</html>