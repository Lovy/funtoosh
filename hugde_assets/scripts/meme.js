var bgImage, stage, stageW, stageH, shapesLayer, gblFillColor = "#fff",
    gblStrokeColor = "#000",
    gblFontFamily = "Impact",
    gblFontSize = 32,
    gblOutlineSize = 1,
    gblStrokeWidth = 1,
    heightStage;

function getSimpleTextHeight() {
    heightStage.clear();
    var a = new Kinetic.Text({
        x: 0,
        y: 0,
        text: "M",
        fontSize: gblFontSize,
        fontFamily: gblFontFamily,
        textFill: "#ff0000",
        textStroke: "#ff0000",
        textStrokeWidth: gblStrokeWidth
    }),
        b = new Kinetic.Layer;
    b.add(a);
    heightStage.add(b);
    for (var a = b.getContext("2d").getImageData(0, 0, 200, 200).data, c = b = 0, e = a.length; c < e; c += 4) a[c] && (b = c);
    return Math.ceil(b / 4 / 200)
}

function getSimpleText(a, b, c) {
    a = 0 != gblStrokeWidth ? new Kinetic.Text({
        x: b,
        y: c,
        text: a,
        fontSize: gblFontSize,
        fontFamily: gblFontFamily,
        textFill: gblFillColor,
        textStroke: gblStrokeColor,
        textStrokeWidth: gblStrokeWidth
    }) : new Kinetic.Text({
        x: b,
        y: c,
        text: a,
        fontSize: gblFontSize,
        fontFamily: gblFontFamily,
        textFill: gblFillColor
    });
    a.on("mouseover", function () {
        document.body.style.cursor = "move"
    });
    a.on("mouseout", function () {
        document.body.style.cursor = "default"
    });
    return a
}

function getTextWidth(a) {
    var b = new Kinetic.Layer,
        b = b.getContext("2d");
    b.font = gblFontSize + "pt " + gblFontFamily;
    return b.measureText(a).width
}

function addText(a, b, c) {
    var b = new Kinetic.Layer,
        e = new Kinetic.Layer,
        j = new Kinetic.Group({
            draggable: !0
        }),
        e = e.getContext("2d");
    e.font = gblFontSize + "pt " + gblFontFamily;
    for (var h = e.measureText(a).width, f = a.toUpperCase().split(" "), g = "", k = "", i = 0, a = [], l = getSimpleTextHeight(), d = 0; d < f.length; d++) k = g, g = g + " " + f[d], h = e.measureText(g).width, h > stageW && (a[i] = k, g = f[d], i++);
    a[i] = g;
    for (d = 0; d < a.length; d++) h = stageW / 2 - e.measureText(a[d]).width / 2, f = c + (l + 3) * d + 5 * (0 < d), j.add(getSimpleText(a[d], h, f));
    b.add(j);
    stage.add(b);
    return b
}
var t;

function initStage() {
    stage = new Kinetic.Stage({
        container: "memestage",
        width: stageW,
        height: stageH
    });
    heightStage = new Kinetic.Stage({
        container: "heightStage",
        width: 200,
        height: 200
    });
    var a = new Kinetic.Image({
        x: 0,
        y: 0,
        image: bgImage
    });
    shapesLayer = new Kinetic.Layer;
    shapesLayer.add(a);
    stage.add(shapesLayer);
    t1 = addText($("#tc1").val(), 0, 30);
    t2 = addText($("#tc2").val(), 0, bgImage.height - 100)
}
$(function () {
    bgImage = new Image;
    bgImage.crossOrigin='anonymous';
    bgImage.onload = function () {
        stageW = bgImage.width;
        stageH = bgImage.height;
        initStage()
    };
    
    bgImage.src = gblImgName;
    
    $("#tc1").keyup(function () {
        t1.remove();
        t1 = addText($("#tc1").val(), 0, 30)
    });
    $("#tc2").keyup(function () {
        t2.remove();
        t2 = addText($("#tc2").val(), 30, bgImage.height - 100)
    });
    $("#cap1").click(function () {
        t1.remove();
        t1 = addText($("#tc1").val(), 0, 30)
    });
    $("#cap2").click(function () {
        t2.remove();
        t2 = addText($("#tc2").val(), 30, bgImage.height - 100)
    });
    $("#rcap1").click(function () {
        t1.remove();
        $("#tc1").val("");
        t1 = addText("", 0, 30)
    });
    $("#rcap2").click(function () {
        t2.remove();
        $("#tc2").val("");
        t2 = addText("", 30, bgImage.height - 100)
    });
    $("#fontsizesel").change(function () {
        gblFontSize = $("#fontsizesel").val()
    });
    /*
    $("#custom").spectrum({
        color: "#fff",
        showPalette: !0,
        showSelectionPalette: !0,
        palette: [],
        showInput: !0,
        clickoutFiresChange: !0,
        change: function (a) {
            gblFillColor = a.toHexString()
        }
    });
    $("#strokesel").spectrum({
        color: "#000",
        showPalette: !0,
        showSelectionPalette: !0,
        palette: [],
        showInput: !0,
        clickoutFiresChange: !0,
        change: function (a) {
            gblStrokeColor = a.toHexString()
        }
    });*/
    $("#cands").click(function () {
    	if(loginStatus=='0'){
			$('#basic').modal('show');  //show login dialog box in case on logged out
		}else{
			gblFontSize = 12;
	        gblFontFamily = "Arial";
	        gblStrokeWidth = 0;
	        addText(watermark, bgImage.width - getTextWidth(watermark), bgImage.height - 10 - getSimpleTextHeight() + 5);
	        stage.toDataURL({
	            callback: function (a) {
	                $("#imgdata").val(a);
	                $("#createimg").submit()
	            }
	        })
		}
        
    })
});

function writeMessage(a, b) {
    var c = a.getContext();
    a.clear();
    c.font = "18pt Calibri";
    c.fillStyle = "black";
    c.fillText(b, 10, 25)
};