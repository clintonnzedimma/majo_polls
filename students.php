<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';

$users = User_Factory::listOfStudents();
?>


<style type="text/css">
	 tr.fields {
	  background: #3a9fd6;
	  color: #fff;
	  font-size: 14px;
	  font-family: arial;
	  padding-top: 50px;
	  padding-bottom: 50px;
	 }

tr.details {
  font-size: 13px;
  font-family: arial;
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: center;
  color: #45473d;
}


</style>

<div align="center">
    <table cellspacing="5"> 
        <tbody><tr class="fields"> <th>SN</th> <th> Full Name</th> <th>MAT NO.</th> <th>Password</th>  <th> VOTED </th></tr>
<?php foreach ($users as $user): ?>
	<?php $U = new User_Singleton($user['id']);?>
        <tr class="details"> 
            <td><?=$user['id']?></td> 
            <td><?=$user['full_name']?></td> 
            <td><?=$user['mat_no']?></td> 
            <td><?=$user['password']?></b></td>

            <?php if (Vote_Factory::userHasCompletedVoting($U)): ?>
            	<td style="color:green">YES</td>  
            	<?php else : ?>          
				<td style="color:red">NO</td>
            <?php endif ?> 
        </tr>

<?php endforeach ?>
<!--         <tr class="details"> 
            <td>{{id}}</td> 
            <td>{{fullname}}</td> 
            <td>{{mat_no}}</td> 
            <td>{{pin}}</b></td>
            <td>{{vote_status}}</td> 
        </tr> -->
    </tbody></table>
</div>