/*
 * AppFee, College Admissions Processor
 * Copyright (C) 2015 Bellevue College
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

USE [ODS]
GO

/****** Object:  Table [dbo].[BCAdmission]    Script Date: 04/06/2015 09:23:23 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[BCAdmission](
	[ReferenceNumber] [int] IDENTITY(1,1) NOT NULL,
	[FirstName] [varchar](32) NOT NULL,
	[LastName] [varchar](32) NOT NULL,
	[MiddleName] [varchar](16) NULL,
	[DOB] [datetime] NOT NULL,
	[Amount] [decimal](10, 2) NULL,
	[ProgramofStudy] [varchar](255) NULL,
	[ReferenceNumberCreation] [datetime] NOT NULL,
	[BillingFirstName] [varchar](32) NULL,
	[BillingLastName] [varchar](32) NULL,
	[BillingEmail] [varchar](200) NULL,
	[BillingPhoneNumber] [varchar](10) NULL,
	[PaymentAuthorization] [datetime] NULL,
	[PaymentSettled] [datetime] NULL,
 CONSTRAINT [PK_Admission] PRIMARY KEY CLUSTERED
(
	[ReferenceNumber] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[BCAdmission] ADD  CONSTRAINT [DF_BCAdmission_ReferenceNumberCreation]  DEFAULT (getdate()) FOR [ReferenceNumberCreation]
GO
