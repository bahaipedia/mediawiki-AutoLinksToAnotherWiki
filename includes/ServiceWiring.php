<?php

/**
 * Implements AutoLinksToAnotherWiki extension for MediaWiki.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

/**
 * @file
 * Adds AnotherWikiPages service.
 */

namespace MediaWiki\AutoLinksToAnotherWiki;

use MediaWiki\Config\ServiceOptions;
use MediaWiki\MediaWikiServices;
use ObjectCache;

// @codeCoverageIgnoreStart

return [
	'AutoLinksToAnotherWiki.AnotherWikiPages' =>
		static function ( MediaWikiServices $services ): AnotherWikiPages {
			return new AnotherWikiPages(
				new ServiceOptions(
					AnotherWikiPages::CONSTRUCTOR_OPTIONS,
					$services->getMainConfig()
				),
				ObjectCache::getLocalClusterInstance(),
				$services->getContentLanguage(),
				$services->getHttpRequestFactory()
			);
		}
];

// @codeCoverageIgnoreEnd
