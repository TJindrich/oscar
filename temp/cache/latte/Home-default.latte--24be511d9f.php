<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: E:\xampp\htdocs\oscar\app\UI\Home/default.latte */
final class Template_24be511d9f extends Latte\Runtime\Template
{
	public const Source = 'E:\\xampp\\htdocs\\oscar\\app\\UI\\Home/default.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['year' => '19, 36', 'oscars' => '19, 36'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="min-vw-100 min-vh-100 d-flex flex-column align-items-center">

		<h1 class="py-5">Oscar</h1>

';
		$ʟ_tmp = $this->global->uiControl->getComponent('uploadForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 8 */;

		echo "\n";
		if (isset($result)) /* line 10 */ {
			echo '			<table class="table table-striped">
				<thead>
					<tr>
						<th>Rok</th>
						<th>Ženy</th>
						<th>Muži</th>
					</tr>
				</thead>
';
			foreach ($result[0] as $year => $oscars) /* line 19 */ {
				echo '					<tr>
						<td>';
				echo LR\Filters::escapeHtmlText($year) /* line 21 */;
				echo '</td>
						<td>';
				echo LR\Filters::escapeHtmlText($oscars['male']['name']) /* line 22 */;
				echo ' (';
				echo LR\Filters::escapeHtmlText($oscars['male']['age']) /* line 22 */;
				echo ')<br>';
				echo LR\Filters::escapeHtmlText($oscars['male']['movie']) /* line 22 */;
				echo '</td>
						<td>';
				echo LR\Filters::escapeHtmlText($oscars['female']['name']) /* line 23 */;
				echo ' (';
				echo LR\Filters::escapeHtmlText($oscars['female']['age']) /* line 23 */;
				echo ')<br>';
				echo LR\Filters::escapeHtmlText($oscars['female']['movie']) /* line 23 */;
				echo '</td>
					</tr>
';

			}

			echo '			</table>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Název filmu</th>
						<th>Rok</th>
						<th>Herečka</th>
						<th>Herec</th>
					</tr>
				</thead>
';
			foreach ($result[1] as $year => $oscars) /* line 36 */ {
				echo '					<tr>
						<td>';
				echo LR\Filters::escapeHtmlText($oscars['movie']) /* line 38 */;
				echo '</td>
						<td>';
				echo LR\Filters::escapeHtmlText($year) /* line 39 */;
				echo '</td>
						<td>';
				echo LR\Filters::escapeHtmlText($oscars['female']) /* line 40 */;
				echo '</td>
						<td>';
				echo LR\Filters::escapeHtmlText($oscars['male']) /* line 41 */;
				echo '</td>
					</tr>
';

			}

			echo '			</table>
';
		} else /* line 45 */ {
			echo '			Žádná data k zobrazení, nahrajte soubory.
';
		}
		echo '
</div>';
	}
}
