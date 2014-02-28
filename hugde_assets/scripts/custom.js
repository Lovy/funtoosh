/**
Custom module for you to write your own javascript functions
**/
var vote = function () {

    // private functions & variables

    var upvote = function(text) {
        alert(text);
    }
    
    var downvote = function(text){
    	
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something. 
            upvote();
            downvote();
            initialise();           
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();