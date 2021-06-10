<?php
    $nPageSize=3;    //每页条数
    $strSQL = "select count(*) as n from users";
    $rst = $pdo->query($strSQL);
    $rstInfo=$rst->fetch();
    $nTotalRecord=$rstInfo["n"];    //总记录条数
    //echo($nTotalRecord);
    if(isset($_REQUEST["page"])){
        $page=$_REQUEST["page"];
    }
    else{
        $page=1;
    }    
    $nTocalPages=ceil($nTotalRecord/$nPageSize);    //总页数
    if($nTocalPages==0){
        $nTocalPages=1;
    }
    if($page<=0){
        $page=1;
    }
    if($page>$nTocalPages){
        $page=$nTocalPages;    
    }
    //echo($page);
    $nStart=($page-1)*$nPageSize;    //起始条数
    //使用limit m,n    m是指记录开始的index，从0开始，表示第一条记录。n是指从第m+1条开始，取n条。
    $strSQL = "select * from users order by id desc limit {$nStart},{$nPageSize}";    //根据id倒叙排序
    //echo($strSQL);
    $rst = $pdo->query($strSQL);
?>