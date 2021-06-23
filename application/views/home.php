<table border="1">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectall" onClick="selectAll(this)" /><button class="btn btn-danger multiple_del" style='cursor: pointer;font-size: 13px;color: #fff;'><i class="fa fa-trash-o">&nbsp;Delete All</i></button></th>
            <th>No</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($data)){?>
        <?php $row = 1; foreach($data as $d){?>
            <tr>
                <td>
                    <input type="checkbox" id="checkbox" name="checkboxlist" value="<?php echo $d['id']?>">
                    
                </td>
                <td><?=$row;?></td>
                <td><?php echo $d['name']?></td>
            </tr>
        <?php $row++; }?>
        <?php }?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    function selectAll(source)
    {
        var checkboxes = document.getElementsByName('checkboxlist');
        // console.log(checkValues);
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }

    $('.multiple_del').click(function(){
        var ck = $('input[name=checkboxlist]:checked').val();
        // alert(ck);
        if(ck)
        {
            var checkValues = $('input[name=checkboxlist]:checked').map(function()
            {
                return $(this).val();
            }).get();

            alert("Are You Sure Want To delete This..");

           
                var url='<?=base_url()?>index.php/home/delete_multiple';
                $.ajax({
                type: 'POST',
                url: url,
                data: { ids : checkValues },
                success:function(data)
                {
                    console.log(data);
                    if (data==1) 
                    {
                        location.reload();
                    }
                    else
                    {
                    alert('something wrong');
                    location.reload();
                    }
                }
                });
            
        }
        else
        {
            alert('plese select record for delete');    
        }
    });
</script>