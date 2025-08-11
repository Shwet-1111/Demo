<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo getenv('app.publicURL');?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo getenv('app.publicURL');?>css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                    <div class="errorpage ptb-50">

                        <h1>404</h1>
                   

                      <p>Page not found</p>
        <button >Back to Home Page</button>
         </div>
         </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo getenv('app.publicURL');?>js/bootstrap.js"></script>
    <script src="<?php echo getenv('app.publicURL');?>js/jquery-3.7.1.min.js"></script>
</body>
</html>


.errorpage {
    min-height: 100vh; /* पूरा viewport height लेगा */
    display: flex;
    flex-direction: column; /* h1 और p को ऊपर-नीचे रखने के लिए */
    justify-content: center; /* vertical center */
    align-items: center; /* horizontal center */
    text-align: center; /* text भी बीच में रहे */
}

.errorpage h1 {
    font-size: 60px;
    font-weight: 500;
    line-height: 64px;
    font-family: Roboto-Bold;
    color: #333F29;
}

.errorpage p {
    font-size: 26px;
    font-weight: 400;
    line-height: 24px;
    color: #424242;
        margin-bottom: 20px;
    font-family: Roboto-Regular;
}
.errorpage button{
    background-color: #D0DD94;
	color: #333F29;
	border-radius: 10px;
	padding: 8px 24px;
	font-family: Roboto-Medium;
	font-size:16px;
	line-height: 26px;
	border: 1px solid transparent;
  
}
.errorpage button:hover
  {
	background-color: #39442F;
	color: #FFFFFF;
  }
.ptb-50{
    padding-top: 50px;
    padding-bottom: 50px;

}

      
