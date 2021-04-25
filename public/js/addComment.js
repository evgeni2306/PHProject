let comment = document.querySelector('.inptcomment');
let commentlist = document.querySelector('.commentslist');
let addcomment = document.querySelector('.addcomment');
let name = document.querySelector('.username');
addcomment.onsubmit = function (evt) {
    evt.preventDefault();
    if(comment.value !=='')
    {
        let newComment = document.createElement('li');
        newComment.classList.add('usercomment');
        newComment.textContent =  name.textContent + ':' +comment.value;
        comment.value = '';
        commentlist.append(newComment);
    }
};
