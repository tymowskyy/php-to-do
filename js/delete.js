const deleteTask = async (task) => {
    const taskData = {
        task_id: task
    };

    try {
        const resp = await axios.post('deleteTask.php', taskData);
        if (resp.data == '1') {
            document.querySelector('#task' + task).remove();
            var itemCount = document.querySelector('#itemCountCurrent')
            itemCount.innerHTML = parseInt(itemCount.innerHTML) - 1;
        }
    }
    catch (err) {
        ;
    }
};

function checkListCount () {
    if (document.querySelectorAll('.menu-option').length == 1)
        document.querySelector('.menu-option-outer .icon-hover').remove();
}

const deleteList = async (list_id) => {
    const listData = {
        list_id: list_id
    };

    try {
        const resp = await axios.post('deleteList.php', listData);
        if (resp.data == '1') {
            if (document.querySelectorAll('#list' + list_id + ' #itemCountCurrent').length)
                window.open('index.php');
            document.querySelector('#list' + list_id).remove();
            checkListCount();
        }
    }
    catch (err) {
        ;
    }
};

checkListCount();