/*
*   Función para comprobar si una cadena de caracteres tiene formato JSON.
*
*   Expects: value (valor de la cadena de caracteres que se desea verificar).
*
*   Returns: true si el valor es correcto y false en caso contrario.
*/
function isJSONString(value)
{
    try {
        if (value != "[]") {
            JSON.parse(value);
            return true;
        } else {
            return false;
        }
    } catch(error) {
        return false;
    }
}
