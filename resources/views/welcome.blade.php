<html>
	<head>
		<title>DutGRIFF</title>

		<link href='//fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'>

		<style>
      body {
        margin: 0;
        padding: 0;
        background-color: black;
        font-family: 'Lato';
        font-weight: 300;
      }
      .container:before {
        content: "";
        position: fixed;
        left: 0;
        right: 0;
        z-index: -1;

        display: block;
        /*
          Blurred images can be compressed smaller. I could have used
          css but it would have been more downloading and processing.
        */
        background-image: url({{ asset('images/welcome-background-blur.jpg') }});
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;

        opacity: .7;
      }

      .container {
        width: 100%;
        height: 100%;
      }
      .content {
        width: 500px;
        height: 140px;

        text-align: center;
        position: fixed;
        bottom: 30px;
        right: 30px;

        padding: 20px;

        background-color: rgba(0,0,0,.4);
      }
      .text {
        opacity: 1;
        color: #19A6FF;
        background-image: -webkit-linear-gradient(92deg, #19A6FF, #508C7B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        -webkit-animation: hue 60s infinite linear;
      }
      .heading {
        font-size: 72px;
        font-weight: 100;
        margin: 0;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      @-webkit-keyframes hue {
        0%, 100% {
          -webkit-filter: hue-rotate(360deg);
          filter: hue-rotate(360deg);
        }
        50% {
          -webkit-filter: hue-rotate(180deg);
          filter: hue-rotate(180deg);
        }
      }
		</style>
	</head>
  <!--

    Mobile:
  -->
	<body>
    <div class="container">
      <div class="content">
        <div class="text">
          <h1 class="heading">DutGRIFF.com</h1>
          Let's build something awesome! <br />
          <b><a href="mailto:sites@dutgriff.com">sites@dutgriff.com</a></b>
        </div>
      </div>
    </div>
	</body>
</html>
