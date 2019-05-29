html, body{
    height:100%; 
    overflow:hidden; 
    padding:0px; 
    margin:0px;
    
    }

textarea {
   resize: none;
}

#chatWith{
    width:100%;
    height:8%;
    background:#233070;
}

.whiteBack p{
    font-weight:bold;
}


a,p{
    font-size:12px; 
    font-family:helvetica;
    }

#container{
    box-shadow:2px 2px 10px #000000; 
    width:1200px; 
    height:90%; 
    margin:2% auto; 
    border-radius:1%;
    overflow:hidden;
}

#menu{
    background:dodgerblue; 
    color:white; 
    padding:1%; 
    font-size:30px;
}

#leftCol, #rightCol{
    position:relative; 
    float:left; 
    height:90%
    
}

#leftCol{
    width:30%;
    background:#efefef;
    border-right: 2px solid dodgerblue;
}

#leftColContainer img{
    border-radius:100%;
}

#rightCol{
    width:69%; 
    border:1px solid #efefef;
}

#leftColContainer, #rightColContainer{
    width:100%; 
    height:100%; 
    margin: 0px auto; 
    overflow:auto;
}

.greyBack{
    border:1px solid black; 
    padding:5px; 
    background:#efefef; 
    margin: 0px auto; 
    margin-top:2px; 
    overflow:auto;
    }
        
.image{
    float:left; 
    margin-right:5px; 
    width:30px; 
    height:30px;
}

#messageContainer{
    height:85%; 
    overflow:auto;
}

.textarea{
    width:99%; 
    height:10%; 
    position:absolute; 
    bottom:1%;
    margin:0px auto;
    border:2px solid dodgerblue;
}
.greyMessage, .whiteMessage{
    border:1px solid black; 
    width:60%; 
    padding:5px; 
    margin:0px auto;
    margin-top:2px; 
    overflow:auto;

}

.greyMessage{
    background:dodgerblue;
    border-radius:10px;
    color:white;
    float:right;
}

.greyMessage p{
    float:right;

}
       
.whiteMessage{
    background:#efefef;
    border-radius:10px;
    float:left;
}

.whiteMessage p{
    float:left;
}
   

#newMessage{
    display:none; 
    box-shadow: 2px 10px 30px #000000;
    width:500px;
    position:fixed;
    top:20%;
    background:white;
    z-index:2;
    left:50%;
    transform:translate(-50%, 0);
    border-radius:5px;
    overflow:auto;
}

.mHeader, .mFooter{
    background:#233070; 
    color:white; 
    margin:0px; 
    padding:5px;
}

.mHeader{
    text-align:center; 
    font-size;20px;
}

.messageInput{
    width:96%;
}
