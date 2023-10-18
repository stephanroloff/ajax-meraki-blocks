import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<p {...useBlockProps()}>
				{__('Im a AJAX GET BLOCK!', 'meraki')}
			</p>
			<div id="loader"></div>
			<div id="result"></div>
		</div>
	);
}

