window.Parsley.addValidator("maxFileSize", {
    validateString: function(_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
            alert(
                "You are making all developpers in the world cringe. Upgrade your browser!"
            );
            return true;
        }
        var files = parsleyInstance.$element[0].files;
        console.log(files);
        return files.length != 1 || files[0].size <= maxSize * 1024;
    },
    requirementType: "integer",
    messages: {
        en: "This file should not be larger than %s Kb",
        fr: "Ce fichier est plus grand que %s Kb."
    }
});
$(".custom-file-input").on("change", function() {
    let fileName = $(this)
        .val()
        .split("\\")
        .pop();
    console.log("hola");
    $(this)
        .next(".custom-file-label")
        .addClass("selected")
        .html(fileName);
});
