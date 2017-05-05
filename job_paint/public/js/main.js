



$ = (typeof $ !== 'undefined') ? $ : {};
$.jobpaint = (typeof $.jobpaint !== 'undefined') ? $.jobpaint : {};

$.jobpaint = (function() {

    var __getContextPath = function(){
        return "";
    }

    var __getImgPath = function(){
        return "/jobpaint-portal/";
    }
	var __executeGet = function (path) {
        var dfd = $.Deferred();
        $.get(path, function(data) {})
        .done(function(data){
            dfd.resolve(data);
        })
        .fail(function(qXHR, textStatus, errorThrown){
            dfd.resolve({
                status : 'ERROR',
                message : errorThrown
            });
        })
        .always(function(data){

        });
        return dfd.promise();
    };
    var __executePost = function(path, jsonObj, customLoader) {
        path = $.jobpaint.getContextPath() + path;
        var d = $.Deferred();
        if(customLoader != ""){
            $("#"+customLoader).show();
        }
        $.ajax({
            method: "POST",
            url: path,
            dataType: "json",
            data: jsonObj
        }).done(function (data, textStatus, jqXHR) {
            if(customLoader != ""){
                $("#"+customLoader).hide();
            }
            d.resolve(data)
        }).fail(function (jqXHR, textStatus, errorThrown,request) {
            console.log('---FAILED---');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log('---FAILED---');
            
            d.resolve({
                status : 'ERROR',
                message : request
            });
            
            if(customLoader != ""){
                $("#"+customLoader).hide();
            }
        });
        
        return d.promise();
    };

    var __executeFile = function(path, jsonObj) {
        var d = $.Deferred();
            $(".overlay-back").show();
            $(".loadDiv").show();
        $.ajax({
            method: "POST",
            url: path,
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            /*data: JSON.stringify(jsonObj)*/
            data: jsonObj
        }).done(function (data, textStatus, jqXHR) {
            d.resolve(data);
            $(".loadDiv").hide();
            $(".overlay-back").hide();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('---FAILED---');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log('---FAILED---');
            
            d.resolve({
                status : 'ERROR',
                message : errorThrown
            });
            $(".overlay-back").hide();
            $(".loadDiv").hide();
        });
        return d.promise();
    };
    
    
    return {
        getContextPath : __getContextPath,
        getImgPath : __getImgPath,
        executePost : __executePost,
        executeGet : __executeGet,
        executeFile : __executeFile
    };
}());
