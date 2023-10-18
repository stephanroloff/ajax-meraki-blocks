import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
	return (
		<div {...useBlockProps.save()}>
			<p>
				{__('Im a AJAX GET BLOCK!', 'meraki')}
			</p>
			<div id="loader">Loading...</div>
			<div id="result"></div>
		</div>
	);
}
