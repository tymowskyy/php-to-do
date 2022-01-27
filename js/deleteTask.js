const deleteTask = async (task) => {
    const taskData = {
        task_id: task
    };
    try {
        const resp = await axios.post('deleteTask.php', taskData);
        if (resp.data == '1') {
            var el = document.getElementById('task' + task);
            el.remove();
            var itemCount = document.getElementById('itemCountCurrent');
            itemCount.innerHTML = parseInt(itemCount.innerHTML) - 1;
        }

    } catch (err) {
        console.error(err);
    }
};