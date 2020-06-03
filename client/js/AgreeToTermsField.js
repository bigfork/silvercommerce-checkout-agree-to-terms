var links = document.getElementsByClassName("agree-terms-modal-link");

for (var i = 0; i < links.length; i++) {
    var element = links[i];
    var content = element
        .parentElement
        .parentElement
        .getElementsByClassName("content-modal")[0]
        .innerHTML;

    element.addEventListener("click", function(event) {
        var modal = new tingle.modal({
            closeMethods: ['overlay', 'button', 'escape'],
            closeLabel: "Close",
            onOpen: function() {
                modal.checkOverflow()	
            },
            onClose: function() {
                modal.destroy();
            }
        });

        modal.setContent();
        modal.open();
    });
}