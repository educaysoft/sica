#!/bin/sh
n=`echo $1 | sed s/"\b\(.\)"/"\U\1"/g`
m=`echo $2	| sed s/"\b\(.\)"/"\U\1"/g`;
echo "${n}"
echo "${m}";


cp "../controllers/${n}.php" ctmp # "../controllers/${m}.php";
cp "../models/${n}_model.php" mtmp # "../models/${m}_model.php";
cp "../views/$1_record.php" vtmp1 # "../views/$2_record.php";
cp "../views/$1_form.php"  vtmp2  #"../views/$2_form.php";
cp "../views/$1_edit.php" vtmp3 #"../views/$2_edit.php";
cp "../views/$1_list.php" vtmp4 # "../views/$2_list.php";

sed s/"${n}"/"${m}"/g ctmp > ctmp1 
sed s/"$1"/"$2"/g    ctmp1 > "../controllers/${m}.php" 


sed s/"${n}"/"${m}"/g mtmp    > mtmp1
sed s/"$1"/"$2"/g     mtmp1 > "../models/${m}_model.php" 



sed s/"${n}"/"${m}"/g vtmp1   > vtmp11
sed s/"$1"/"$2"/g    vtmp11  >"../views/$2_record.php"



sed s/"${n}"/"${m}"/g vtmp2  > vtmp21
sed s/"$1"/"$2"/g   vtmp21  >"../views/$2_form.php"


sed s/"${n}"/"${m}"/g vtmp3  > vtmp31
sed s/"$1"/"$2"/g vtmp31  >"../views/$2_edit.php"



sed s/"${n}"/"${m}"/g  vtmp4 > vtmp41
sed s/"$1"/"$2"/g  vtmp41  >"../views/$2_list.php"
