/************************************************************
 *
 * Connect 4
 *
 * Copyright 2013. All Rights Reserved.
 * This file may not be redistributed in whole or part.
 *
 * Application: Connect 4Web App
 * a3.js -- Initialize UI
 *
 ************************************************************/

var myturn = true;
var color  = "red"
var matchID = 0;
var userID = 0;
var boardName = ['totalCount', 'column1Count', 'column2Count', 'column3Count', 'column4Count', 'column5Count', 'column6Count', 'column7Count' ];

$(window).load(function() {
    if($('#user_id').val() && $('#match_id').val())
    {
        matchID = $('#match_id').val();
        userID = $('#user_id').val();
        initPlay(matchID, userID);
        insertGameboard(matchID);
        changeState();
    }
});

/*
 * Insert game board.
 */
function insertGameboard(matchID)
{
    var result = {};
    for (var i = 0; i < boardName.length; i++) {
        result[boardName[i]] = $("#" + boardName[i]).val();
    }
    var boardString = JSON.stringify(result);
    var path = "/index.php/test/insertGameboard/" + matchID;
    $.post(path, { 'json':  boardString} );
}

/*
 * Initialize game.
 */
function initPlay(matchID, userID)
{
    var path = "/test/getUser1/" + matchID + "/" + userID; 
    $.get(path, function( data ) {
        if(data == "true")
        {
            myturn = true;
            color = "red";
        }
        else
        {
            myturn  = false;
            color = "green";
        }
    });
}

/*
 * Change state.
 */
function changeState(){
    if(!myturn)
    {
        var path = "/test/getBoardState/" + matchID; 
        $.get(path, function( data ) {
            object = JSON.parse(data);
            if(object.totalCount != $("#totalCount").val())
            {
                //alert("I am hit" + object.totalCount + " Local: " + $("#totalCount").val());
                for (var i = 0; i < boardName.length; i++) {
                    
                    if(boardName[i] != "totalCount")
                    {
                        if(object[boardName[i]] != $("#" + boardName[i]).val())
                        {

                            if(color == "red")
                            {
                                animateDown(boardName[i].substring(0, boardName[i].length-5), 1, 0, "green");

                            }
                            else
                            {
                                animateDown( boardName[i].substring(0, boardName[i].length-5), 1, 0, "red");
                            }
                            var newUpdateColumnValue = parseInt($("#" + boardName[i]).val()) + 1;
                            $("#" + boardName[i]).val(newUpdateColumnValue.toString());

                            var newUpdateTotalValue = parseInt($("#totalCount").val()) + 1;
                            $("#totalCount").val(newUpdateTotalValue.toString());

                            myturn = true;
                        }
                    }
                }
            }
        });
    }
    setTimeout(function() {changeState();}, 300);
}

$('.column').click(function() {
    if(myturn){
        if($("#" + $(this).attr('id') + "-row1").css( "background-color" ) == "rgb(255, 255, 255)")
        {
            // myturn = true;
            // if(color == "red")
            // {
            //     color = "green";
            // }
            // else
            // {
            //     color = "red";
            // }

            myturn = false;
            var newCount = parseInt($("#totalCount").val()) + 1;
            $("#totalCount").val(newCount.toString());

            var newColumnCount = parseInt($("#" + $(this).attr('id') + "Count").val()) + 1;
            $("#" + $(this).attr('id') + "Count").val(newColumnCount.toString());

            insertGameboard(matchID);
            animateDown($(this).attr('id'), 1, 0, color);
        }
        else
        {
            alert("This Column Is Full");
        }
    }
});

/*
 * Check winner.
 */
function checkWinner(columnNum, rowNum){
    
    if(checkVertical(columnNum, rowNum)[0]==4)
    {
        var winnerArray = checkVertical(columnNum, rowNum);
        alert(winnerArray[1] + " is Winner");
        return winnerArray[1];
    }
    else if (checkHorizontal(columnNum, rowNum)[0] == 4)
    {
        var winnerArray = checkHorizontal(columnNum, rowNum);
        alert(winnerArray[1] + " is Winner");
        return winnerArray[1];
    }
    else if (checkLeftDiagonal(columnNum, rowNum)[0] == 4)
	{
        var winnerArray = checkLeftDiagonal(columnNum, rowNum);
		alert(winnerArray[1] + " is Winner");
		return winnerArray[1];
	}
    else if(checkRightDiagonal(columnNum, rowNum)[0]==4)
    {
    	var winnerArray = checkRightDiagonal(columnNum, rowNum);
		alert(winnerArray[1] + " is Winner");
		return winnerArray[1];
	}
    
}

/*
 * Check left diagonal.
 */
 
function checkLeftDiagonal(columnNum, rowNum) {
	var color = "rgb(255, 255, 255)";
    if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == "rgb(255, 255, 255)")
    {
        return 0;
    }
    else
    {
        color = $("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" );
        return [addTopLeft(columnNum, rowNum, color) + addBottomRight(columnNum, rowNum, color) + 1, color];
    }
}

/*
 * Check right diagonal.
 */
 
function checkRightDiagonal(columnNum, rowNum) {
	var color = "rgb(255, 255, 255)";
    if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == "rgb(255, 255, 255)")
    {
        return 0;
    }
    else
    {
        color = $("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" );
        return [addTopRight(columnNum, rowNum, color) + addBottomLeft(columnNum, rowNum, color) + 1, color];
    }
}

/*
 * Check Horizontal.
 */
function checkHorizontal(columnNum, rowNum){
    var color = "rgb(255, 255, 255)";
    if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == "rgb(255, 255, 255)")
    {
        return 0;
    }
    else
    {
        color = $("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" );
        return [addLeft(columnNum, rowNum, color) + addRight(columnNum, rowNum, color) + 1, color];
    }
}

/*
 * Check vertical.
 */
function checkVertical(columnNum, rowNum){
    var color = "rgb(255, 255, 255)";
    if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == "rgb(255, 255, 255)")
    {
        return 0;
    }
    else
    {
        color = $("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" );
        return [addTop(columnNum, rowNum, color) + addButtom(columnNum, rowNum, color) + 1, color];
    }
}

/*
 * Add top right for diagonal.
 */
 
function addTopRight(columnNum, rowNum, color){
	columnNum = columnNum + 1;
	rowNum = rowNum - 1;
	var total = 0;
	while (rowNum > 0 && columnNum < 8) {
		if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum + 1;
			rowNum = rowNum - 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
	}
	return total;
}

/*
 * Add bottom left for diagonal.
 */
 
function addBottomLeft(columnNum, rowNum, color){
	columnNum = columnNum - 1;
	rowNum = rowNum + 1;
	var total = 0;
	while (rowNum < 7 && columnNum > 0) {
		if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum - 1;
			rowNum = rowNum + 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
	}
	return total;
}

/*
 * Add top left for diagonal
 */
 
function addTopLeft(columnNum, rowNum, color){
	columnNum = columnNum - 1;
	if (columnNum < 0) {
		return 0;
	}
	rowNum = rowNum - 1;
	if (rowNum < 0) {
		return 0;
	}
	var total = 0;
	while (rowNum > 0 && columnNum > 0) {
		if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum - 1;
			rowNum = rowNum - 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
	}
	return total;
}

/*
 * Add bottom right for diagonal.
 */
 
function addBottomRight(columnNum, rowNum, color){
	columnNum = columnNum + 1;
	rowNum = rowNum + 1;
	var total = 0;
	while (rowNum < 7 && columnNum < 8) {
		if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum + 1;
			rowNum = rowNum + 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
	}
	return total;
}	

/*
 * Add right for checking horizontal.
 */
function addRight(columnNum, rowNum, color){
    columnNum = columnNum + 1;
    var total = 0;
    while(columnNum < 8)
    {
        if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum + 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
    }
    return total;
}

/*
 * Add left for checking horizontal.
 */
function addLeft(columnNum, rowNum, color){
    columnNum = columnNum - 1;
    var total = 0;
    while(columnNum > 0)
    {
        if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            columnNum = columnNum - 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
    }
    return total;
}

/*
 * Add top for checking vertical.
 */
function addTop(columnNum, rowNum, color){
    rowNum = rowNum - 1;
    var total = 0;
    while(rowNum > 0)
    {
        if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            rowNum = rowNum - 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
    }
    return total;
}

/*
 * Add bottom for checking vertical.
 */
function addButtom(columnNum, rowNum, color){
    rowNum = rowNum + 1;
    var total = 0;
    while(rowNum < 7)
    {
        if($("#column" + columnNum.toString() + "-row" + rowNum.toString()).css( "background-color" ) == color)
        {
            rowNum = rowNum + 1;
            total = total + 1;
        }
        else
        {
            return total;
        }
    }
    return total;
}

/*
 * Animate discs for moving down.
 */
function animateDown(id, top, prev, localColor){
    var rowPrev = "#" + id + "-row" + prev.toString();
    var rowId = "#" + id + "-row" + top.toString();
    if(top < 7)
    {
        rowPrev = "#" + id + "-row" + prev.toString();
        rowId = "#" + id + "-row" + top.toString();
        if($(rowId).css( "background-color" ) == "rgb(255, 255, 255)")
        {
            $(rowId).css( "background-color", localColor);
            $(rowPrev).css( "background-color", "white");
            top += 1;
            prev += 1;
            setTimeout(function() {
                animateDown(id, top, prev, localColor);
            }, 100);
        }
        else
        {
            checkWinner(parseInt(id.substr(id.length - 1)), top-1);
            top = 7;
        }
    }
    else{
        checkWinner(parseInt(id.substr(id.length - 1)), top-1);
    }
}

// setup refresh button and add button
$('#createAccount').click(function() {
    window.location.href = "/account/newForm";
});
$('#resetPassword').click(function() {
    window.location.href = "/account/recoverPasswordForm";
});
$('#create').click(function() {
    var p1 = $("#pass1"); 
    var p2 = $("#pass2");
    
    if (p1.val() != p2.val()) {
        $("#messageList").html("<div class='error'><p>Confirmation Does Not Match</p></div>");
        return false;
    }
    else if($('#captcha_secret').val() != $('#captcha').val())
    {
        $("#messageList").html("<div class='error'><p>Captcha Not Correct!</p></div>");
        return false;
    }
    else
    {
        $('#createform').submit();
    }
});

$('#login').click(function() {
    if($('#captcha_secret').val() != $('#captcha').val())
    {
        $("#messageList").html("<div class='error'><p>Captcha Not Correct! - "+$('#captcha_secret').val() +"</p></div>");
        return false;
    }
    else
    {   
        $('#loginform').submit();
    }
});

$('#availableUsers').everyTime(500,function(){
    $('#availableUsers').load('/arcade/getAvailableUsers');

    $.getJSON('/arcade/getInvitation',function(data, text, jqZHR){
            if (data && data.invited) {
                var user=data.login;
                var time=data.time;
                if(confirm('Play ' + user)) 
                    $.getJSON('/arcade/acceptInvitation',function(data, text, jqZHR){
                        if (data && data.status == 'success')
                            window.location.href = '/board/index'
                    });
                else  
                    $.post("/arcade/declineInvitation");
            }
    });
});

