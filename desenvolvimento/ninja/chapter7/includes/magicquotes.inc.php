<?php
// DESABILITA MAGIC QUOTES NECESSÁRIO APENAS PARA FORMULÁRIOS que foi uma má ideia do php era para impedir SQL injections, mas sua implementação causou muitos problemas e já deve ter sido removida, mas para remover é necessário esse código. A maneira correta é usando prepared statements que prepara a instrução antes da execução.
if (get_magic_quotes_gpc())
{
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process))
		{
		foreach ($val as $k => $v)
			{
			unset($process[$key][$k]);
			if (is_array($v))
				{
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				}
			else
				{
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
	unset($process);
}
?>