function loadMarkdown(id) {
    document.querySelector('[id^="md_container_"]').style.display = 'none';
    document.getElementById('md_container_'+id).style.display = 'block';
}