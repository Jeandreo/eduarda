function generateMasks(){
    Inputmask(["(99) 9999-9999", "(99) 9 9999-9999"], {
        "clearIncomplete": true,
    }).mask(".input-phone");
}