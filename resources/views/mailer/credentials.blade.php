@extends('layouts.mail')
@section('content')
<table class="es-content" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
      <td class="esd-stripe" esd-custom-block-id="2820" align="center">
        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
          <tbody>
            <tr>
              <td class="esd-structure es-p40t es-p20b es-p40r es-p40l" esd-general-paddings-checked="false" align="left">
                <table width="100%" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="esd-container-frame esd-checked" width="520" valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td esdev-links-color="#000000" class="esd-block-text" align="left">
                                <p style="font-size: 16px; line-height: 150%;">
                                  {{ zactra::translate_lang('Dear') }} {{$clientName}}, {{ zactra::translate_lang("We won't be able to fix your client reports, without your credentials.") }}
                                </p>
                                <p style="font-size: 16px; line-height: 150%;">
                                  {{ zactra::translate_lang('Please provide all the credentials for continuing the cooperation.') }}
                                </p>
                                <p style="font-size: 16px; line-height: 150%;">
                                  {{ zactra::translate_lang('We need them for getting your reports and for enabling you to resolve your disputes') }}
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td class="esd-structure es-p10t es-p10b es-p40r es-p40l" esd-general-paddings-checked="false" align="left">
                <table width="100%" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="esd-container-frame" width="520" valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td align="center" class="esd-block-button">
                                <button style="border-radius: 6px;background-color: #3490dc;border: none;color: white !important;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">
                                  <a href="{{route('client.credentials')}}" class="es-button" target="_blank" style="font-size: 20px;">{{ zactra::translate_lang('Log in') }} </a>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                <table cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="560" class="esd-container-frame" align="center" valign="top">
                        <table cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" class="esd-block-text">
                                <p>{{ zactra::translate_lang('If you did not create an account, no further action is required.') }}</p>
                                <p>{{ zactra::translate_lang('Regards,') }}</p>
                                <p>{{ zactra::translate_lang('Prudent Credit Solutions') }}</p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
@endsection
