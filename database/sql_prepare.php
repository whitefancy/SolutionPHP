<?php
//Object oriented style
//
//public mysqli::prepare(string $query): mysqli_stmt|false
//Procedural style
//
//mysqli_prepare(mysqli $mysql, string $query): mysqli_stmt|false
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

$city = "Amersfoort";
//Object oriented style
/* create a prepared statement */
$stmt = $mysqli->prepare("SELECT District FROM City WHERE Name=?");

/* bind parameters for markers */
$stmt->bind_param("s", $city);

/* execute query */
$stmt->execute();

/* bind result variables */
$stmt->bind_result($district);

/* fetch value */
$stmt->fetch();

printf("%s is in district %s\n", $city, $district);

//Procedural style
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "my_user", "my_password", "world");

$city = "Amersfoort";

/* create a prepared statement */
$stmt = mysqli_prepare($link, "SELECT District FROM City WHERE Name=?");

/* bind parameters for markers */
mysqli_stmt_bind_param($stmt, "s", $city);

/* execute query */
mysqli_stmt_execute($stmt);

/* bind result variables */
mysqli_stmt_bind_result($stmt, $district);

/* fetch value */
mysqli_stmt_fetch($stmt);

printf("%s is in district %s\n", $city, $district);

// ... document's example code:

/* bind parameters for markers */
$stmt->bind_param("s", $city);

/* execute query */
$stmt->execute();

/* instead of bind_result: */
$result = $stmt->get_result();

/* now you can fetch the results into an array - NICE */
while ($myrow = $result->fetch_assoc()) {

    // use your $myrow array as you would with any other fetch
    printf("%s is in district %s\n", $city, $myrow['district']);

}

function mysqli_prepared_query($link, $sql, $typeDef = FALSE, $params = FALSE)
{
    if ($stmt = mysqli_prepare($link, $sql)) {
        if (count($params) == count($params, 1)) {
            $params = array($params);
            $multiQuery = FALSE;
        } else {
            $multiQuery = TRUE;
        }

        if ($typeDef) {
            $bindParams = array();
            $bindParamsReferences = array();
            $bindParams = array_pad($bindParams, (count($params, 1) - count($params)) / count($params), "");
            foreach ($bindParams as $key => $value) {
                $bindParamsReferences[$key] = &$bindParams[$key];
            }
            array_unshift($bindParamsReferences, $typeDef);
            $bindParamsMethod = new ReflectionMethod('mysqli_stmt', 'bind_param');
            $bindParamsMethod->invokeArgs($stmt, $bindParamsReferences);
        }

        $result = array();
        foreach ($params as $queryKey => $query) {
            foreach ($bindParams as $paramKey => $value) {
                $bindParams[$paramKey] = $query[$paramKey];
            }
            $queryResult = array();
            if (mysqli_stmt_execute($stmt)) {
                $resultMetaData = mysqli_stmt_result_metadata($stmt);
                if ($resultMetaData) {
                    $stmtRow = array();
                    $rowReferences = array();
                    while ($field = mysqli_fetch_field($resultMetaData)) {
                        $rowReferences[] = &$stmtRow[$field->name];
                    }
                    mysqli_free_result($resultMetaData);
                    $bindResultMethod = new ReflectionMethod('mysqli_stmt', 'bind_result');
                    $bindResultMethod->invokeArgs($stmt, $rowReferences);
                    while (mysqli_stmt_fetch($stmt)) {
                        $row = array();
                        foreach ($stmtRow as $key => $value) {
                            $row[$key] = $value;
                        }
                        $queryResult[] = $row;
                    }
                    mysqli_stmt_free_result($stmt);
                } else {
                    $queryResult[] = mysqli_stmt_affected_rows($stmt);
                }
            } else {
                $queryResult[] = FALSE;
            }
            $result[$queryKey] = $queryResult;
        }
        mysqli_stmt_close($stmt);
    } else {
        $result = FALSE;
    }

    if ($multiQuery) {
        return $result;
    } else {
        return $result[0];
    }
}