
<?php
  $act = $_POST['act'];
  $act = $act.'.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('HTTP/1.1 307 Temporary move');
}
header('Location:'.$act);
exit();

#region >>> SessionCheck
function SessionCheck($act)
{ 
  echo("<form name='SessionCheck' action='$act' method='post'>");
  echo("</form> <script language='javascript'> document.SessionCheck.submit(); </script>");
  echo("<script>location.replace('$act');</script>");
}
#endregion <<< SessionCheck


#region >>> login_check
function LoginCheck($act)
{
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    echo("<form name='login_check' action='$act' method='post'>");
    echo("<input type='hidden' name='id' value='$id'>");
    echo("<input type='hidden' name='pw' value='$pw'>");
    echo("</form> <script language='javascript'> document.LoginCheck.submit(); </script>");
    echo("<script>location.replace('$act');</script>");
}
#endregion <<< login_check


#region >>> Logout
function LogOut($act)
{
    echo("<form name='LogOut' action='$act' method='post'>");
    echo("</form> <script language='javascript'> document.LogOut.submit(); </script>");
    echo("<script>location.replace('$act');</script>");
}
#endregion <<< Logout

#region >>> ReSign
function ReSign($act)
{
    $id = $_POST['id'];


    echo("<form name='ReSign' action='$act' method='post'>");
    echo("<input type='hidden' name='id' value='$id'>");
    echo("</form> <script language='javascript'> document.ReSign.submit(); </script>");
    echo("<script>location.replace('$act');</script>");
}
#endregion <<< ReSign


#region >>> Ranking
function Ranking($act)
{
    $id = $_POST['id'];

    echo("<form name='Ranking' action='$act' method='post'>");
    echo("<input type='hidden' name='id' value='$id'>");
    echo("</form> <script language='javascript'> document.Ranking.submit(); </script>");
    echo("<script>location.replace('$act');</script>");
}
#endregion <<< ReSign

#region >>> SingleStagClear
function SingleGameResult($act)
{
    $id = $_POST['id'];

    $score = $_POST['score'];
    echo("<form name='SingleGameResult' action='$act' method='post'>");
    echo("<input type='hidden' name='id' value='$id'>");
    echo("<input type='hidden' name='score' value='$score'>");
    echo("</form> <script language='javascript'> document.SingleGameResult.submit(); </script>");
    echo("<script>location.replace('$act');</script>");
}
#endregion <<< SingleStagClear

?>
