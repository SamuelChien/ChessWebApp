<html>
<head>
<script>
    /*
    var shapes = []; // This array hold all the objects of all classes on the canvas.
    var selected_shape;

    var canvas;
    var context;
    var x,y;
	var otherUser = = "<?= $otherUser->login ?>";
	var user = "<?= $user->login ?>";
	var myid = "<?= $user->id ?>";
	var status = "<?= $status ?>";
	var moved = false; 
	var ready = false;
	var responded = true;
	var sent = true;
	var myColor, Opponent, temp;
	
	$(function(){
		$('body').everyTime(2000,function(){
				if (status == 'waiting') {
					$.getJSON('<?= base_url() ?>arcade/checkInvitation',function(data, text, jqZHR){
							if (data && data.status=='rejected') {
								alert("Sorry, your invitation to the games was declined!");
								window.location.href = '<?= base_url() ?>arcade/index';
							}
							if (data && data.status=='accepted') {
								status = 'playing';
								initBoard();
								$('#status').html('Playing ' + otherUser);
							}
							
					});
				}
				var url = "<?= base_url() ?>board/getMsg";
				$.getJSON(url, function (data,text,jqXHR){
					if (data && data.status=='success') {
						var conversation = $('[name=conversation]').val();
						var msg = data.message;
						if (msg.length > 0)
							$('[name=conversation]').val(conversation + "\n" + otherUser + ": " + msg);
					}
				});
		});

		$('form').submit(function(){
			var arguments = $(this).serialize();
			var url = "<?= base_url() ?>board/postMsg";
			$.post(url,arguments, function (data,textStatus,jqXHR){
					var conversation = $('[name=conversation]').val();
					var msg = $('[name=msg]').val();
					$('[name=conversation]').val(conversation + "\n" + user + ": " + msg);
					});
			return false;
			});
			.everyTime(100,function(){
				if (status == 'playing'){
					if (!ready){
						ready = true;
						responded = false;
						initBoard();
					} else {
						if (responded){
							responded = false;
							$.getJSON('<?= base_url() ?>board/getBoardStatus', function(data, text, jqZHR){
								responded = true;
								if (data) {

									// add s tuff here
									};
								}
							});
						}
						if (moved && sent){
							sent = false;
							if (mytank.shot > 0){
								s = 1;
								}	else s = 0;
							$.post('<?= base_url() ?>combat/postBoardStatus', {}, // add data table..
									function(data, text, jqZHR){sent = true;});
							moved = false;
						}

					}	

				};
	});
	});
*/
		
    /**
     * main function to create the canvas and draw the seats.
     */
     /*
    window.onload = function() {
      canvas = document.getElementById("qanvaz");

      // ...then set the internal size to match
      canvas.width  = canvas.offsetWidth;
      canvas.height = canvas.offsetHeight;

      context = canvas.getContext("2d");
      canvas.onmousedown = canvasDown;
	
      var tableString = "hello";
      var table = tableString.split(", ");
      var rows = 0;
      var cols = 0;
      for (var i=1;i <= 7; i++) {
        for (var j=1;j <=6; j++) {
            shapes.push(new Seat(canvas,80*i-20,80*j-20,30,0, false, i+j, j, i));
        }
      }
      context.stroke();
      drawShapes();
    };var selected_seat; // The last selected shape


	function initBoard(){
		$.getJSON('<?= base_url() ?>board/getGameStatus',function(data, text, jqZHR){
			if (data) {
				var board_circles = data.board_circles.split("");
				for (var i=0;i<board_circles.length;i++) {
					var color;
					if (board_circles[i]=="0") {
						color="white";
					} else if (board_circles[i]=="1") {
						color="red";
					} else {
						color="yellow";
					}
					shapes.push(new Seat(canvas,80*i-20,80*j-20,30,0, false, i+j, j, i, color));
				}

				if (data.user2_id == myid){
					temp = myColor;
					myColor = opponent;
					opponent = temp; 
				};
				
				responded = true;
			};
		});
		drawShapes();
		setInterval("drawShapes()", 1000 / 24);
	};
	*/
    /**
     * react to event of clicking a seat on the canvas.
     * if seat is not taken, change its color to green, 
     * otherwise do nothing.
     */
     /*
    function canvasDown(e){

        // x and y coordinates of the current position of the mouse pointer
        x = e.pageX - totalOffsetLeft(canvas); 
        y = e.pageY - totalOffsetTop(canvas);

        // Look for the clicked object.
        for(var i=shapes.length-1; i>=0; i--) {

            var shape = shapes[i];

            // If mouse is within the boundaries of an object
            // then move it to the end of the array to make it
            // the top-most shape.
            if (shape.testHit(x, y)){
              var foundSpot = findCorrectSpot(shape);
              if (foundSpot != null) {
                //deselect();
                foundSpot.isSelected = true;
                selected_shape = foundSpot;
				//check if there is a winner.
              }
              drawShapes();
              return;
            }
        }

    }
    
    function findCorrectSpot(shape) {
        var column = shape.column;
        var row = shape.row;
        
        var lowest = 0;
        var correctSpot;
        for (var i=shapes.length-1; i>=0; i--) {
            var candidate = shapes[i];
            if (candidate.column === column && candidate.isSelected==false && candidate.row > lowest) {
                lowest = candidate.row;
                correctSpot = candidate;
            } 
        }
        
        if (lowest < 1) {
            return null;
        } else {
            return correctSpot;
        }
    }
    */
    /**
     * unselect a seat.
     */
     /*
    function deselect(){
        if (selected_shape != null) {
            selected_shape.isSelected = false;
            selected_shape = null;
        }
    }
    */
    /**
     * Draw all the objects on the canvas that are in the array shapes. 
     */ 
     /*
    function drawShapes() {
      // Clear the canvas.
      context.clearRect(0, 0, canvas.width, canvas.height);
      // Go through all the shapes.
      for(var i=0; i<shapes.length; i++) {
        var shape = shapes[i];
        shape.draw();
      }
    }

	function checkWinner() {

		var numCorrect=0;
		var haveWinner=false;
		var winnerColor;

		// search rows
		for (var row=1; row <= 3; row++) {
			numCorrect=0;
			haveWinner=false;
			for (var col=1; col<=7; col++) {
				if (haveWinner==false) {
					numCorrect=1;
					haveWinner=true;
					winnerColor=shapes[(col-1)*6+row].color;
				} else {
					if (winnerColor === shapes[(col-1)*6+row].color) {
						numCorrect++;
						if(numCorrect==4) {
							return winnerColor;
						}
					} else {
						numCorrect=0;
						haveWinner=false;
					}
				}
			}
		}

		// search columns
		for (var col=1; col<=4; col++) {
			numCorrect=0;
			haveWinner=false;
			for (var row=1; row<=6; row++) {
				if (haveWinner==false) {
					numCorrect=1;
					haveWinner=true;
					winnerColor=shapes[(col-1)*6+row].color;
				} else {
					if (winnerColor === shapes[(col-1)*6+row].color) {
						numCorrect++;
						if(numCorrect==4) {
							return winnerColor;
						}
					} else {
						numCorrect=0;
						haveWinner=false;
					}
				}
			}
		}

		// search diagonals
		// first, get all the diagonals.
		var diagonals = [];
		var d = [shapes[1],shapes[8],shapes[15],shapes[22],shapes[29],shapes[36]];
		diagonals.push(d);
		var d = [shapes[2],shapes[9],shapes[16],shapes[23],shapes[30]];
		diagonals.push(d);
		var d = [shapes[4],shapes[10],shapes[17],shapes[24]];
		diagonals.push(d);
		var d = [shapes[7],shapes[14],shapes[21],shapes[28],shapes[35],shapes[42]];
		diagonals.push(d);
		var d = [shapes[13],shapes[20],shapes[27],shapes[34],shapes[41]];
		diagonals.push(d);
		var d = [shapes[19],shapes[26],shapes[33],shapes[40]];
		diagonals.push(d);
		var d = [shapes[19],shapes[14],shapes[9],shapes[4]];
		diagonals.push(d);
		var d = [shapes[25],shapes[20],shapes[15],shapes[10],shapes[5]];
		diagonals.push(d);
		var d = [shapes[31],shapes[26],shapes[21],shapes[16],shapes[11], shapes[6]];
		diagonals.push(d);
		var d = [shapes[37],shapes[32],shapes[27],shapes[22],shapes[17], shapes[12]];
		diagonals.push(d);
		var d = [shapes[38],shapes[33],shapes[28],shapes[23],shapes[18]];
		diagonals.push(d);
		var d = [shapes[39],shapes[34],shapes[29],shapes[24]];
		diagonals.push(d);

		// now search all diagonals
		for (var d=0; d<diagonals.length; d++) {
			numCorrect=0;
			haveWinner=false;
			for (var i=0; i<diagonals[d].length; i++) {
				if (haveWinner==false) {
					numCorrect=1;
					haveWinner=true;
					winnerColor=diagonals[d][i].color;
				} else {
					if (winnerColor === diagonals[d][i].color) {
						numCorrect++;
						if(numCorrect==4) {
							return winnerColor;
						}
					} else {
						numCorrect=0;
						haveWinner=false;
					}
				}
			}
		}
		return null; // when we have no winner

	}
	
	function win(userID) {
		status = 'finished';
		if (userID == 0){
			alert("YOU WON!");
		} else if (userID == 1) {
			alert("Opponent won!");
		}
		window.location.href = '<?= base_url() ?>arcade/index';
		
	};
    */
    /**
     * create a seat object with the position and size parameters as well as 
     * a boolean "is_taken" to tell if the seat is taken or not, and finally the id of the seat.
     */
    //function Seat(canvas, x, y, width, height, is_taken, id) {
        /*
    function Seat(canvas, x, y, radius, start, is_taken, id, row, column) {

          this.context = canvas.getContext("2d");
          // x and y coordinates, width and height
          // and the color of the rectangle
          this.x = x;
          this.y = y;
          this.column = column;
          this.row = row;
          //this.width = width;
          //this.height = height;
          this.radius = radius;
          this.start = start;
          this.isTaken = is_taken;
          this.isSelected = false;
          this.id = id;
          this.color = "white";

          this.draw = function () {
            // Draw the rectangle.
            this.context.globalAlpha = 0.85;
            this.context.beginPath();
            //this.context.rect(this.x, this.y, this.width, this.height);
            this.context.arc(this.x, this.y, this.radius, this.start, 2*Math.PI);

			if (this.isSelected){// && whoIsPlaying==true) {
				this.color = "red";
			//} else if (this.isSelected && whoIsPlaying==false) {
				//this.color = "yellow";
			} else {
				this.color = "white";
			}
 
            this.context.fillStyle = this.color;
            this.context.strokeStyle = "black";
            this.context.lineWidth = 3;
            this.context.fill();
            this.context.stroke();

          };

          // Test whether mouse is clicked within rectangle or outside.
          this.testHit = function(testX,testY) {
            if (Math.sqrt(Math.pow(this.x - testX, 2) + Math.pow(this.y - testY, 2)) <= this.radius) {
              return true;
            }
            return false;
          };

    };
    */
    /**
     * helper to get coordinates of mouse pointer. 
     */
     /*
    function totalOffsetLeft(element){
        var offset = element.offsetLeft;
        while (element = element.offsetParent){
                offset += element.offsetLeft;
            } ;
        return offset;
    };
    */
    /**
     * helper to get coordinates of mouse pointer. 
     */
     /*
    function totalOffsetTop(element){
        var offset = element.offsetTop;
        while (element = element.offsetParent){
                offset += element.offsetTop;
            } ;
        return offset;
    };
    */
    </script>
</head>

<body>
    <h1>Connect 4</h1>
	<div>
	Hello <?php echo $user->fullName() ?>  <?php echo anchor('account/logout','(Logout)') ?>  <?php echo anchor('account/updatePasswordForm','(Change Password)') ?>
	</div>
	
	<div id='status'> 
	<?php 
		if ($status == "playing")
			echo "Playing " . $otherUser->login;
		else
			echo "Wating on " . $otherUser->login;
	?>
	</div>
    <canvas class="paintcanvas" id="qanvaz" width="600" height="520" style="border:3px solid #000000;"></canvas>
	<div id="chat">
	<?php 

		echo form_textarea('conversation');
		echo form_open();
		echo form_input('msg');
		echo form_submit('Send','Send');
		echo form_close();

	?>
		</div>
</body>
</html>